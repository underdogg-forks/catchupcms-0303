<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		@if (Auth::user())
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="{{ get_gravatar(Auth::user()->email, 160) }}" class="" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>{{ Auth::user()->full_name }}</p>
				<a href="#"><i class="fa fa-circle text-success"></i> In Space</a>
			</div>
		</div>
		@endif

		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			@include('includes.mainnavigation')
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>