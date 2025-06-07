 <div class="breadcrumbs overlay">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="breadcrumbs-content">
                     <h1 class="page-title">{{ $title }}</h1>
                     <p>{{ $description }}</p>
                 </div>
                 <ul class="breadcrumb-nav">
                     <li><a href="{{ route('home') }}">{{__('Home')}}</a></li>
                     <li>{{ $page }}</li>
                 </ul>
             </div>
         </div>
     </div>
 </div>