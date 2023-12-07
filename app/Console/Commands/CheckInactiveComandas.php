<?php
 namespace App\Console\Commands;

 use Illuminate\Console\Command;
 use App\Models\Comanda;
 use App\Models\Pedido;
 use Carbon\Carbon;
 
 class CheckInactiveComandas extends Command
 {
     protected $signature = 'comandas:checkinactive';
 
     protected $description = 'Check and update inactive comandas';
 
     public function handle()
     {
         $fourHoursAgo = Carbon::now()->subHours(4);
 
         // Encontre as comandas ativas
         $comandas = Comanda::where('status', 1)->get();
 
         foreach ($comandas as $comanda) {
             // Encontre o último pedido dessa comanda
             $ultimoPedido = Pedido::where('comanda_id', $comanda->id)
                 ->orderBy('created_at', 'desc')
                 ->first();
 
             if ($ultimoPedido && $ultimoPedido->created_at < $fourHoursAgo) {
                 // Se não houver pedido nos últimos 4 horas, encerre a comanda
                 $comanda->status = 0;
                 $comanda->save();
                 $this->info("Comanda #{$comanda->id} encerrada por inatividade.");
             }
         }
 
         $this->info('CheckInactiveComandas completed.');
     }
 }
 