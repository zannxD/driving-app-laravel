<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentReportMontly extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS payment_reports");

        DB::statement(
                "CREATE VIEW payment_reports
                AS
                SELECT YEAR(p.`date`) as year, MONTH(p.`date`) as month, type, SUM(p.amount) as amount
                FROM payments p
                GROUP BY YEAR(p.`date`), MONTH(p.`date`),type;"
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
         DB::statement("DROP VIEW IF EXISTS payment_reports");
    }
}
