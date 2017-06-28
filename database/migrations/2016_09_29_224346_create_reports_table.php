<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Enums\ReportStatuses;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('project_id')->unsigned()->index();

            $table->string('class');
            $table->string('file');
            $table->integer('line')->unsigned();
            $table->string('message');
            $table->text('trace')->nullable()->default(null);

            $table->enum('status', ReportStatuses::getAll())
                ->default(ReportStatuses::NEW_ONE)
                ->index();

            $table->integer('group_id')
                ->unsigned()
                ->nullable()
                ->default(null);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reports');
    }
}

