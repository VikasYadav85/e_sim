<?php
namespace App\Console;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Storage;

use App\Console\Commands\CreditNoteDailyRunCron;  
use App\Console\Commands\CustomerDailyRunCron;  
use App\Console\Commands\DistibouterDailyRunCron;  
use App\Console\Commands\GRNDailyRunCron;  
use App\Console\Commands\PricingPlanDailyRunCron;  
use App\Console\Commands\ProductDailyRunCron;  
use App\Console\Commands\SalesInvoiceDailyRunCron;  
use App\Console\Commands\StockAdjustmentDailyRunCron;  
use App\Console\Commands\WarehouseStockCron;  

use App\Console\Commands\SyncEfrisWarehouseStockCron;  
use App\Console\Commands\SyncEfrisSalesInvoiceCron;  
use App\Console\Commands\SyncEfrisGRNDailyRunCron;  
use App\Console\Commands\SyncEfrisStockAdjustmentDailyRunCron; 
use App\Console\Commands\SyncEfrisCustomerDailyRunCron; 


use App\Console\Commands\SetApiSalesInvoiceCron;  
use App\Console\Commands\SetApiSalesRetunrCron;  
use App\Console\Commands\SetApiCustomerCron; 
use App\Console\Commands\SyncEfrisProductDailyRunCron; 

class Kernel extends ConsoleKernel
{
    
        /**
         * The Artisan commands provided by your application.
         *
         * @var array
         */
        
         protected $commands = [
        
         Commands\CreditNoteDailyRunCron::class,   
         Commands\CustomerDailyRunCron::class,   
         Commands\DistibouterDailyRunCron::class,   
         Commands\GRNDailyRunCron::class,   
         Commands\PricingPlanDailyRunCron::class,   
         Commands\SalesInvoiceDailyRunCron::class, 
         Commands\StockAdjustmentDailyRunCron::class, 
         Commands\WarehouseStockCron::class, 
         Commands\ProductDailyRunCron::class,  

         Commands\SyncEfrisWarehouseStockCron::class, 
         Commands\SyncEfrisSalesInvoiceCron::class, 
         Commands\SyncEfrisGRNDailyRunCron::class, 
         Commands\SyncEfrisStockAdjustmentDailyRunCron::class, 
        //  Commands\SetApiCustomerCron::class, 
        //  Commands\SetApiCustomerCron::class, 
        Commands\SyncEfrisCustomerDailyRunCron::class, 

         Commands\SetApiSalesInvoiceCron::class, 
         Commands\SetApiSalesRetunrCron::class, 
         Commands\SetApiCustomerCron::class, 

         Commands\SyncEfrisProductDailyRunCron::class, 
          
        ];
    
        /**
         * Define the application's command schedule.
         *
         * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
         * @return void
         */
         
    protected function schedule(Schedule $schedule)
    {  
             //$schedule->command('stock:ledgerreport')->everyMinute()->withoutOverlapping();
            //$schedule->command('stock:ledgerreport')->dailyAt('01:00')->timezone('Africa/Kampala')->withoutOverlapping();   
           //$schedule->command('product:products')->hourly()->withoutOverlapping();  
          //$schedule->command('product:products')->hourly()->withoutOverlapping();  
            //$schedule->command('backup:run')->everyMinute()->withoutOverlapping(); 
            $schedule->command('creditnote:creditnotes')->hourly()->withoutOverlapping();  
            $schedule->command('customer:customers')->hourly()->withoutOverlapping();    
            $schedule->command('grndaily:grndailys')->hourly()->withoutOverlapping();  
            $schedule->command('pricing:pricingplan')->hourly()->withoutOverlapping();  
            $schedule->command('salesinvoice_code:salesinvoice_codes')->hourly()->withoutOverlapping();  
            $schedule->command('stock:stockadjustments')->hourly()->withoutOverlapping();             
            $schedule->command('product:product_run')->hourly()->withoutOverlapping(); 
            $schedule->command('warehouse_stock:warehouse_stocks')->hourly()->withoutOverlapping();  

           // $schedule->command('sync_warehouse_stocks:sync_warehouse_stock')->everyMinute()->withoutOverlapping();  
           // $schedule->command('SyncEfrisSalesInvoice:SyncEfrisSalesInvoices')->everyMinute()->withoutOverlapping();  
          //  $schedule->command('SyncEfrisGRNDaily:SyncEfrisGRNDailys')->everyMinute()->withoutOverlapping();  
          //  $schedule->command('sync_efris_stockadjustment:sync_efris_stockadjustments')->everyMinute()->withoutOverlapping(); 
         // $schedule->command('syncefriscustomer:syncefriscustomers')->hourly()->withoutOverlapping();  
            
            $schedule->command('SetApiSalesInvoice:SetApiSalesInvoices')->hourly()->withoutOverlapping();  
            $schedule->command('SetApiSalesRetunr:SetApiSalesRetunrs')->hourly()->withoutOverlapping();  
            $schedule->command('SetApiCustomer:SetApiCustomers')->hourly()->withoutOverlapping();



            // $schedule->command('SyncEfrisProductDaily:SyncEfrisProductDailys')->everyMinute()->withoutOverlapping();

             
    }
     
        /**
         * Register the commands for the application.
         *
         * @return void
         */
        protected function commands()
        {
            $this->load(__DIR__.'/Commands');
    
            require base_path('routes/console.php');
        }
    }
    