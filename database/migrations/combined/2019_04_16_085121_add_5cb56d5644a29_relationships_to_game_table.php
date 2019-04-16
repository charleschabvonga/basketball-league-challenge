<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5cb56d5644a29RelationshipsToGameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('games', function(Blueprint $table) {
            if (!Schema::hasColumn('games', 'team1_id')) {
                $table->integer('team1_id')->unsigned()->nullable();
                $table->foreign('team1_id', '292656_5cb567ed092be')->references('id')->on('teams')->onDelete('cascade');
                }
                if (!Schema::hasColumn('games', 'team2_id')) {
                $table->integer('team2_id')->unsigned()->nullable();
                $table->foreign('team2_id', '292656_5cb567ed1f8a3')->references('id')->on('teams')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('games', function(Blueprint $table) {
            if(Schema::hasColumn('games', 'team1_id')) {
                $table->dropForeign('292656_5cb567ed092be');
                $table->dropIndex('292656_5cb567ed092be');
                $table->dropColumn('team1_id');
            }
            if(Schema::hasColumn('games', 'team2_id')) {
                $table->dropForeign('292656_5cb567ed1f8a3');
                $table->dropIndex('292656_5cb567ed1f8a3');
                $table->dropColumn('team2_id');
            }
            
        });
    }
}
