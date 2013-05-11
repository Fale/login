<?php

use Illuminate\Database\Migrations\Migration;

class AddForeignkeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        // Move old tables
        Schema::rename('documents', 'documents_old');
        Schema::rename('document_types', 'document_types_old');
        Schema::rename('email_checks', 'email_checks_old');
        Schema::rename('groups', 'groups_old');
        Schema::rename('password_reminders', 'password_reminders_old');
        Schema::rename('roles', 'roles_old');
        Schema::rename('users', 'users_old');
        Schema::rename('user_infos', 'user_infos_old');

        // Create new tables
        Schema::create('users', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('email', 45)->unique();
            $table->string('password', 64);
            $table->string('cf', 16);
            $table->boolean('checked');
            $table->boolean('verified');
            $table->timestamp('lastaccess_at');
            $table->timestamps();
        });
        Schema::create('document_types', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->boolean('unique');
            $table->boolean('back');
            $table->boolean('pages');
        });
        Schema::create('documents', function($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->string('number');
            $table->string('provider');
            $table->timestamp('provided');
            $table->timestamp('expiry');
            $table->boolean('verified');
            $table->boolean('hidden');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('type_id')->references('id')->on('document_types');
        });
        Schema::create('email_checks', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('user_id')->primary()->unsigned();
            $table->string('token');
            $table->timestamp('created_at');
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::create('groups', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('zip');
            $table->string('province', 2);
            $table->timestamps();
        });
        Schema::create('password_reminders', function($table)
        {
            $table->engine = 'InnoDB';
            $table->string('email');
            $table->string('token');
            $table->timestamp('created_at');
        });
        Schema::create('roles', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('user_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->integer('level');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('group_id')->references('id')->on('groups');
        });
        Schema::create('user_infos', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('user_id')->unsigned();
            $table->string('name', 64);
            $table->string('surname', 64);
            $table->boolean('sex');
            $table->date('birth');
            $table->string('address', 30);
            $table->string('number', 10);
            $table->string('address2', 30);
            $table->string('city', 30);
            $table->string('province', 2);
            $table->string('zip', 10);
            $table->string('country', 30);
            $table->string('phone', 16);
            $table->integer('group_id')->unsigned()->nullable();
            $table->boolean('tesserato');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('group_id')->references('id')->on('groups');
        });
        Schema::table('delete_checks', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('user_id_new')->after('user_id')->unsigned();
        });

        // Move data from old to the new tables
        
        foreach (DB::table('users_old')->get() as $data)
        {
            $values = Array();
            $values['id'] = $data->id;
            $values['email'] = $data->email;
            $values['password'] = $data->password;
            $values['cf'] = $data->cf;
            $values['checked'] = $data->checked;
            $values['verified'] = $data->verified;
            $values['lastaccess_at'] = $data->lastaccess;
            $values['created_at'] = $data->created_at;
            $values['updated_at'] = $data->updated_at;
            DB::table('users')->insert($values);
        }
        foreach (DB::table('document_types_old')->get() as $data)
        {
            $values = Array();
            $values['id'] = $data->id;
            $values['name'] = $data->name;
            $values['unique'] = $data->unique;
            $values['back'] = $data->back;
            $values['pages'] = $data->pages;
            DB::table('document_types')->insert($values);
        }
        foreach (DB::table('documents_old')->get() as $data)
        {
            if (DB::table('users')->find($data->user_id)
                AND DB::table('types')->find($data->type))
            {
                $values = Array();
                $values['id'] = $data->id;
                $values['user_id'] = $data->user_id;
                $values['type_id'] = $data->type;
                $values['number'] = $data->number;
                $values['provider'] = $data->provider;
                $values['provided'] = $data->provided;
                $values['expiry'] = $data->expiry;
                $values['verified'] = $data->verified;
                $values['hidden'] = $data->hidden;
                $values['created_at'] = $data->created_at;
                $values['updated_at'] = $data->updated_at;
                DB::table('documents')->insert($values);
            }
        }
        foreach (DB::table('email_checks_old')->get() as $data)
        {
            if (DB::table('users')->find($data->user_id))
            {
                $values = Array();
                $values['user_id'] = $data->user_id;
                $values['token'] = $data->token;
                $values['created_at'] = $data->created_at;
                DB::table('email_checks')->insert($values);
            }
        }
        foreach (DB::table('groups_old')->get() as $data)
        {
            $values = Array();
            $values['id'] = $data->id;
            $values['name'] = $data->name;
            $values['zip'] = $data->zip_code;
            $values['province'] = $data->province;
            $values['created_at'] = $data->created_at;
            $values['updated_at'] = $data->updated_at;
            DB::table('groups')->insert($values);
        }
        foreach (DB::table('password_reminders_old')->get() as $data)
        {
            $values = Array();
            $values['email'] = $data->email;
            $values['token'] = $data->token;
            $values['created_at'] = $data->created_at;
            DB::table('password_reminders')->insert($values);
        }
        foreach (DB::table('roles_old')->get() as $data)
        {
            if (DB::table('users')->find($data->user_id)
                AND DB::table('groups')->find($data->group_id))
            {
                $values = Array();
                $values['user_id'] = $data->user_id;
                $values['group_id'] = $data->group_id;
                $values['level'] = $data->level;
                $values['created_at'] = $data->created_at;
                $values['updated_at'] = $data->updated_at;
                DB::table('roles')->insert($values);
            }
        }
        foreach (DB::table('user_infos_old')->get() as $data)
        {
            if (DB::table('users')->find($data->user_id))
            {
                $values = Array();
                $values['user_id'] = $data->user_id;
                $values['name'] = $data->name;
                $values['surname'] = $data->surname;
                $values['sex'] = $data->sex;
                $values['birth'] = $data->birth;
                $values['address'] = $data->address;
                $values['number'] = $data->number;
                $values['city'] = $data->city;
                $values['province'] = $data->province;
                $values['zip'] = $data->zipcode;
                $values['country'] = $data->country;
                $values['phone'] = $data->phone;
                if (DB::table('groups')->find($data->group))
                    $values['group_id'] = $data->group;
                else
                    $values['group_id'] = NULL;
                $values['tesserato'] = $data->tesserato;
                $values['created_at'] = $data->created_at;
                $values['updated_at'] = $data->updated_at;
                DB::table('user_infos')->insert($values);
            }
        }
        foreach (DB::table('delete_checks')->get() as $data)
            $data->update(Array('user_id_new' => $data->user_id));

        // Removing old tables
        Schema::table('delete_checks', function($table)
        {
            $table->dropColumn('user_id');
            $table->renameColumn('user_id_new', 'user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::drop('documents_old');
        Schema::drop('document_types_old');
        Schema::drop('email_checks_old');
        Schema::drop('groups_old');
        Schema::drop('password_reminders_old');
        Schema::drop('roles_old');
        Schema::drop('users_old');
        Schema::drop('user_infos_old');

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        // There is no way down for MyISAM -> InnoDB.
        // For the columns name there will be a way down.
        // The Foreign Keys will be deleted
        Schema::table('users', function($table)
        {
            $table->timestamp('lastaccess')->after('lastaccess_at');
        });
        Schema::table('documents', function($table) {
            $table->integer('type')->after('type_id');
            $table->dropForeign('documents_user_id_foreign');
            $table->dropForeign('documents_type_id_foreign');
        });
        Schema::table('email_checks', function($table)
        {
            $table->dropForeign('email_checks_user_id_foreign');
        });
        Schema::table('groups', function($table)
        {
            $table->string('zip_code')->after('zip');
        });
        Schema::table('roles', function($table)
        {
            $table->dropForeign('roles_user_id_foreign');
            $table->dropForeign('roles_group_id_foreign');
        });
        Schema::table('user_infos', function($table)
        {
            $table->string('zipcode')->after('zip');
            $table->string('address 2')->after('address2');
            $table->integer('group')->after('group_id');
            $table->dropForeign('user_infos_user_id_foreign');
            $table->dropForeign('user_infos_group_id_foreign');
        });
        Schema::table('delete_checks', function($table)
        {
            $table->dropForeign('delete_checks_user_id_foreign');
        });

        // Move data from new columns back to old columns
        foreach (User::all() as $data)
            $data->update(Array('lastaccess' => $data->lastaccess_at));
        foreach (Document::all() as $data)
            $data->update(Array('type' => $data->type_id));
        foreach (Group::all() as $data)
            $data->update(Array('zip_code' => $data->zip));
        foreach (UserInfo::all() as $data)
            $data->update(Array(
                'zipcode' => $data->zip, 
                'group' => $data->group_id,
                'address 2' => $data->address2
            ));

        // Removing new columns
        Schema::table('users', function($table)
        {
            $table->dropColumn('lastaccess_at');
        });
        Schema::table('documents', function($table)
        {
            $table->dropColumn('type_id');
        });
        Schema::table('groups', function($table)
        {
            $table->dropColumn('zip');
        });
        Schema::table('user_infos', function($table)
        {
            $table->dropColumn('zip');
            $table->dropColumn('address2');
            $table->dropColumn('group_id');
        });
	}

}
