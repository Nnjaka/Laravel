<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news_sources', function (Blueprint $table) {
            $table->foreignId('news_id')
                ->after('id')
                ->constrained('news')
                ->cascadeOnDelete();

            $table->foreignId('source_id')
                ->after('news_id')
                ->constrained('sources')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news_sources', function (Blueprint $table) {
            $table->dropForeign('news_id');
            $table->dropForeign('source_id');
            $table->dropColumn('news_id');
            $table->dropColumn('source_id');
        });
    }
};
