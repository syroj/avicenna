<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email');
            $table->string('password');
            $table->string('phone');
            $table->string('address');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('products',function(Blueprint $i){
          $i->increments('id');
          $i->string('title');
          $i->string('category');
          $i->string('price');
          $i->decimal('modal');
          $i->decimal('disc');
          $i->decimal('afterDisc');
          $i->integer('stock');
          $i->integer('point')->default(0);
          $i->integer('recomended')->default(0);
          $i->string('photo')->nullable();
          $i->timestamps();
        });
        Schema::create('categories',function(Blueprint $cat){
          $cat->increments('id');
          $cat->string('category');
          $cat->timestamps();
        });
        Schema::create('distributors',function(Blueprint $dist){
          $dist->increments('id');
          $dist->string('distributor');
          $dist->string('email');
          $dist->string('address');
          $dist->string('phone');
          $dist->timestamps();
        });
        Schema::create('publishers',function(Blueprint $pub){
          $pub->increments('id');
          $pub->string('publisher');
          $pub->string('email');
          $pub->string('address');
          $pub->string('phone');
          $pub->timestamps();
        });
        Schema::create('tab_orders',function(Blueprint $o){
          $o->increments('id');
          $o->string('id_cart');
          $o->decimal('totalPrice');
          $o->decimal('totalQty');
          $o->date('date');

        });
        Schema::create('orders',function(Blueprint $ord){
          $ord->increments('id');
          $ord->string('order_id');
          $ord->string('cust_id')->nullable();
          $ord->date('date');
          $ord->string('product_id');
          $ord->string('title');
          $ord->string('qty');
          $ord->string('price');
          $ord->string('modal');
          $ord->string('laba');
          $ord->string('status');
          $ord->timestamps();
        });
        Schema::create('transactions',function(Blueprint $trans){
          $trans->increments('id');
          $trans->date('date');
          $trans->integer('in')->default(0);
          $trans->integer('out')->default(0);
          $trans->string('description');
        });
        Schema::create('customers',function(Blueprint $cust){
          $cust->increments('id');
          $cust->string('customer_id');
          $cust->string('name');
          $cust->string('phone');
          $cust->string('address');
          $cust->string('email');
          $cust->integer('poin')->default(0);
          $cust->timestamps();
        });
        Schema::create('priceChanges',function(Blueprint $change){
          $change->increments('id');
          $change->string('id_product');
          $change->string('price_before');
          $change->string('price_after');
          $change->string('disc_before');
          $change->string('disc_after');
          $change->timestamps();
        });
        Schema::create('shops',function(Blueprint $tab){
          $tab->increments('id');
          $tab->string('id_product');
          $tab->integer('addStock');
          $tab->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
        Schema::drop('products');
        Schema::drop('categories');
        Schema::drop('distributors');
        Schema::drop('publishers');
        Schema::drop('orders');
        Schema::drop('transactions');
        Schema::drop('customers');
        Schema::drop('priceChanges');
        Schema::drop('shops');
        Schema::drop('tab_orders');

    }
}
