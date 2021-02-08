<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLevelAndDomainsColumnsOnInscritTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inscrits', function (Blueprint $table) {
            $table->string('niveau')->after('nom');
            $table->string('filiere')->after('niveau');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inscrits', function (Blueprint $table) {
            $table->dropColumn(['niveau', 'filiere']);
        });
    }
}
