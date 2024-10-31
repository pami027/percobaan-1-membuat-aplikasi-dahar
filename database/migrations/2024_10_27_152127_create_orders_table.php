<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained()->onDelete('cascade');
            $table->foreignId('topping_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('oil_id')->nullable()->constrained('oils')->onDelete('set null'); // Pastikan ini merujuk ke 'oils'
            $table->foreignId('spiciness_level_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('portion_id')->constrained()->onDelete('cascade');
            $table->decimal('total_price', 10, 2);
            $table->string('status')->default('pending');
            $table->string('qr_code')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

