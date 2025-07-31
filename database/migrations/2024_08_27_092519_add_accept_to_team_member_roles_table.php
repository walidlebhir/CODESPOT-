<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAcceptToTeamMemberRolesTable extends Migration
{
    public function up()
    {
        Schema::table('team_member_roles', function (Blueprint $table) {
            $table->boolean('accept')->default(false)->after('account_id'); // Replace 'existing_column' with the column after which you want to add 'accept'
        });
    }

    public function down()
    {
        Schema::table('team_member_roles', function (Blueprint $table) {
            $table->dropColumn('accept');
        });
    }
}
