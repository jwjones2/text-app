 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
			</li>

			<!--  MEMBERS  *separate for ease of access -->
			<li class="nav-item dropdown">
				<a href="/contacts" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Manage
					<span class="caret"></span>
				</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a href="/contacts" class="dropdown-item">Contacts</a>
						<a href="{{url("groups")}}" class="dropdown-item">Groups</a>
						<a href="./hooks.php" class="dropdown-item">Special Responses</a>
					</div>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="/questions">Questions</a>
			</li>

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="/responses" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Responses
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="/responses">Special Responses</a>
					<a class="dropdown-item" href="/general">General Responses</a>
				</div>
			</li>

			<li class="nav-item">
					<a class="nav-link" href="/logs">Logs</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="/pricing">Pricing</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="/errors">Errors</a>
			</li>

		</ul>

		<!-- Right Side Of Navbar -->
		<ul class="navbar-nav ml-auto">
			<!-- Authentication Links -->
			@guest
				<li class="nav-item">
					<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
				</li>
			@else
				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						{{ Auth::user()->name }} <span class="caret"></span>
					</a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('logout') }}"
							onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
							{{ __('Logout') }}
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
				</li>
			@endguest
		</ul>
	</div>
</nav>
