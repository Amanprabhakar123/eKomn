<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAssignerIdToShineProductsTable extends Migration
{
    public function up()
    {
        Schema::table('shine_products', function (Blueprint $table) {
            $table->unsignedBigInteger('assigner_id')->nullable()->after('user_id');
            $table->foreign('assigner_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('shine_products', function (Blueprint $table) {
            $table->dropForeign(['assigner_id']);
            $table->dropColumn('assigner_id');
        });
    }
};