<div class="p-2 border rounded">
    <ul class="space-y-2 text-sm h-96">
        <li class="p-2 rounded {{Request::routeIs('profile.info')?'text-white bg-blue-600':''}}">
            <a href="{{route('profile.info')}}" class="flex items-center gap-2 ">
                <i class='bx bxs-user-circle'></i>
                <span>Account Info</span>
            </a>
        </li>
        <li  class="p-2 rounded {{Request::routeIs('order.index')?'text-white bg-blue-600':''}}">
            <a href="{{route('order.index')}}" class="flex items-center gap-2 ">
                <i class='bx bx-shopping-bag'></i>
                <span>Orders</span>
            </a>
        </li>
        <li  class="p-2 rounded {{Request::routeIs('transaction.index')?'text-white bg-blue-600':''}}">
            <a href="{{route('transaction.index')}}" class="flex items-center gap-2 ">
                <i class='bx bx-credit-card'></i>
                <span>Transactions</span>
            </a>
        </li>
        <li  class="p-2 rounded ">

            <a href="{{route('order.index')}}" class="flex items-center gap-2 ">
                <i class='bx bx-package'></i>
                <span>Shipping</span>
            </a>
        </li>
        
        <li class="p-2 rounded {{Request::routeIs('profile.edit')?'text-white bg-blue-600':''}}">
            <a href="{{route('profile.edit')}}" class="flex items-center gap-2 ">
                <i class='bx bx-cog'></i>
                <span>Settings</span>
            </a>
        </li>
    </ul>
</div>
