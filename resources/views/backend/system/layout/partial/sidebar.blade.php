 <!-- Sidebar -->
 <aside class="w-64 bg-green-950 text-green-100 flex flex-col justify-between">
     <div class="p-6">
         <div class="flex items-center gap-2 mb-10">
             <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white font-bold">
                 F
             </div>
             <span class="text-xl font-semibold">Fund</span>
         </div>

         <!-- Menu -->
         <nav class="flex flex-col gap-4">
             <a href="{{ route('index') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-green-600">
                 <i class="fas fa-arrow-left"></i>
                 Visit Website
             </a>
             <a href="#" class="flex items-center gap-2 px-3 py-2 rounded bg-green-700 hover:bg-green-600">
                 <i class="fas fa-tachometer-alt"></i>
                 Overview
             </a>
             <a href="#" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-green-700">
                 <i class="fas fa-hand-holding-heart"></i>
                 Donation
             </a>
             <a href="#" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-green-700">
                 <i class="fas fa-chart-line"></i>
                 Analytics
             </a>
             <a href="#" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-green-700">
                 <i class="fas fa-users"></i>
                 Community
             </a>
         </nav>
     </div>

     <!-- Other -->
     <div class="p-6 flex flex-col gap-4 border-t border-green-800">
         <a href="#" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-green-700">
             <i class="fas fa-cog"></i>
             Settings
         </a>
         <a href="#" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-green-700">
             <i class="fas fa-question-circle"></i>
             Help Center
         </a>
         <a href="#" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-green-700">
             <i class="fas fa-flag"></i>
             Report
         </a>
     </div>
 </aside>
