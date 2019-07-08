<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('type_documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->char('code')->nullable();
            $table->char('cufe_algorithm')->nullable();
            $table->char('prefix')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('type_documents');
    }
}
