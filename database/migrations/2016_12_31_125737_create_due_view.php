<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDueView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS due_reports");
        //
        DB::statement(
            "CREATE VIEW due_reports
            AS
            select c.fullname,c.total_price, 
            IFNULL((SELECT SUM(amount) 
                    from payments p
                     where p.customer_id = c.id),0) as paid 
            from customers c;
            "
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
          DB::statement("DROP VIEW IF EXISTS due_reports");
    }
}
