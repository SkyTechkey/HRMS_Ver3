@can('User.Add')
<h1> bạn đã có quyền thêm </h1>

@endcan
@cannot('User.Add')
<h1> bạn không được quyền thêm </h1>
@endcannot
