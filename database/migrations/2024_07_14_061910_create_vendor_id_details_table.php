<?php

use App\Enums\VendorAccountType;
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
        Schema::create('vendor_id_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id')->constrained('vendors')->cascadeOnDelete();
            $table->string('account_type')->default(VendorAccountType::INDIVIDUAL->value);
            $table->string('ID_Name');
            $table->string('ID_Number')->unique();
            $table->string('ID_Card_Front');
            $table->string('ID_Card_Back');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor_id_details');
    }
};
