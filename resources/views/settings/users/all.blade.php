@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Settings</h1>
</section>

<section class="content">
	<!-- Default box -->
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">All users</h3>
		</div>
		<div class="box-body">
			<br style="clear:both;">
			@can('user_view')
				<table class="table table-responsive no-padding table-hover">
					<tbody>
						<tr>
							<th>ID</th>
							<th>Full name</th>
							<th>username</th>
							<th>email</th>
							<th>profile</th>
							<th>last login</th>
							<th>verified</th>
							<th>created at</th>
							@can('user_update')
								<th>action</th>
							@endcan
						</tr>
						@foreach( $users as $user )
							<tr {!! $user->username == 'admin' ? 'style="background-color:#ebebeb;"' : '' !!}>
								<td>{{ $user->id }}</td>
								<td>{{ $user->full_name }}</td>
								<td>{{ $user->username }}</td>
								<td>{{ $user->email }}</td>
								<td>{!! $user->hasProfile() ? '<a href="'.url($user->profilePath()).'"><i class="fa fa-external-link text-blue"></i></a>' : '<a href="'.url("profiles/".$user->username."/create").'"><i class="fa fa-plus text-green"></i></a>' !!}</td>
								<td>{{ $user->last_login }}</td>
								<td>{!! $user->verified == 1 ? '<i class="fa fa-check text-green"></i>' : '<i class="fa fa-close text-red"></i>' !!}</td>
								<td>{{ $user->created_at }}</td>
								@can('user_update')
									<td>
										@can('role_update')
											@if($user->username != 'admin')
												<button type="button" class="btn btn-xs btn-warning btn-flat" onclick="editUserRoles('{{ $user->username }}')"><i class="fa fa-eye"></i> roles</button>
											@endif
										@endcan
										@can('user_update')
											<button type="button" class="btn btn-xs btn-default btn-flat" onclick="editUser('{{ $user->username }}')"><i class="fa fa-edit text-blue"></i></button>
										@endcan
										@can('user_delete')
											@if($user->username != 'admin')
												<button type="button" data-username="{{ $user->username }}" class="btn btn-xs btn-default btn-flat" data-toggle="modal" data-target="#confirmUserDelete"><i class="fa fa-trash text-red"></i></button>
											@endif
										@endcan
									</td>
								@endcan
							</tr>
						@endforeach
					</tbody>
				</table>
			@endcan
		</div><!-- /.box-body -->
	</div><!-- /.box -->

	@can('user_update')
		<div class="modal fade" tabindex="-1" role="dialog" id="editUser">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span></button>
						<h4 class="modal-title">Edit account</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<form role="form" id="editUserForm" method="POST" action="{{ url('users/'.$user->username) }}">
									{!! method_field('PATCH') !!}
									{!! csrf_field() !!}
									<div class="form-group{{ $errors->has('full_name') ? ' has-error' : ' has-feedback' }}">
										<label for="full_name">Full Name*</label>
										<input type="text" class="form-control" placeholder="Name Surname" name="full_name" value="{{ old('full_name') ? old('full_name') : $user->full_name }}" required>
										@if ($errors->has('full_name'))
										<span class="help-block">
											<strong>{{ $errors->first('full_name') }}</strong>
										</span>
										@endif
									</div>
									<div class="form-group{{ $errors->has('email') ? ' has-error' : ' has-feedback' }}">
										<label for="email">Email*</label>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
											<input type="email" class="form-control" placeholder="user@email.com" name="email" value="{{ old('email') ? old('email') : $user->email }}" required>
										</div>
										@if ($errors->has('email'))
										<span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
										@endif
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
									</div>
								</form>
							</div>
							<div class="col-md-6">
								<!-- <h4>Change password</h4> -->
								<form role="form" id="editPasswordForm" method="POST" action="{{ url('users/'.$user->username.'/password') }}">
									{!! method_field('PATCH') !!}
									{!! csrf_field() !!}
									<div class="form-group{{ $errors->has('password') ? ' has-error' : ' has-feedback' }}">
										<label for="password">New password*</label>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-lock"></i></span>
											<input type="password" class="form-control" name="password" value="{{ old('password') }}" required>
										</div>
										@if ($errors->has('password'))
										<span class="help-block">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
										@endif
									</div>
									<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : ' has-feedback' }}">
										<label for="password_confirmation">Confirm new password*</label>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-lock"></i></span>
											<input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
										</div>
										@if ($errors->has('password_confirmation'))
										<span class="help-block">
											<strong>{{ $errors->first('password_confirmation') }}</strong>
										</span>
										@endif
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Change</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
		</div>
			@if ($errors->has('error_code') AND $errors->first('error_code') == 6)
				<script type="text/javascript">
					$('#editUser').modal('show');
				</script>
			@endif
	@endif
	@can('user_delete')
		<div class="modal fade" tabindex="-1" role="dialog" id="confirmUserDelete">
				<div class="modal-dialog modal-md">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
							</button>
							<h4 class="modal-title">Confirm user deletion</h4>
						</div>
						<div class="modal-body">
							<p>Are you sure you want to delete <b><span id="username"></span></b>?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
							{!! Form::open(['method' => 'DELETE', 'id'=>'delForm']) !!}
							<button type="submit" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Delete</button>
							{!! Form::close() !!}
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
		</div>
	@endcan
	@can('role_update')
		<div class="modal fade" tabindex="-1" role="dialog" id="editUserRoles">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span></button>
						<h4 class="modal-title">Edit roles</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<form role="form" id="updateUserRolesForm" method="POST" action="">
									{!! csrf_field() !!}
									<label for="roles">Roles</label><br />
										@foreach(crmRoles() as $role)
											<div class="form-group">
												<input type="checkbox" class="minimal margin-r-5" name="roles[{{ $role->id }}]" value="{{ $role->name }}" />&nbsp;&nbsp;{{ $role->label . ' (' . $role->name . ')' }}<br />
											</div>
										@endforeach
									<br style="clear:both;">
									<div class="form-group">
										<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
		</div>
	@endcan
</section><!-- /.content -->

@stop