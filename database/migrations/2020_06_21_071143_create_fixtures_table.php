<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Fixtures', function (Blueprint $table) {
            $table->primary(['home_team_id', 'away_team_id']);
            $table->foreignId('home_team_id');
            $table->foreignId('away_team_id');
            $table->timestamps();

            $table->foreign('home_team_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');

            $table->foreign('away_team_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Fixtures');
    }
}
