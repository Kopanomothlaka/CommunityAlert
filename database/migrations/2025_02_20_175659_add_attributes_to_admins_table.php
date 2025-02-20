<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->text('about')->nullable()->after('password');
            $table->string('job', 255)->nullable()->after('about');
            $table->string('country', 100)->nullable()->after('job');
            $table->string('address', 255)->nullable()->after('country');
            $table->string('phone', 20)->nullable()->after('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn(['about', 'job', 'country', 'address', 'phone']);
        });
    }
};
