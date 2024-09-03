<div class="p-4 border rounded">
    <ul class="space-y-4 text-base ">
        <li>
            <a href="{{route('profile.info')}}" class="flex items-center gap-2 ">
                <i class='bx bxs-user-circle' ></i>
                <span>Account info</span>
            </a>
        </li>
        <li class="flex items-center gap-2 ">
            <i class='bx bx-shopping-bag'></i>
            <span>Orders</span>
        </li>
        <li class="flex items-center gap-2 ">
            <i class='bx bx-package'></i>
            <span>Shipping</span>
        </li>
        <li>
            <a href="{{route('profile.edit')}}" class="flex items-center gap-2 ">
                <i class='bx bx-cog'></i>
                <span>Settings</span>
            </a>
        </li>
    </ul>
</div>
