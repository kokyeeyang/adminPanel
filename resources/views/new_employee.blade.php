<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
		<div class="card">
				<form action="saveNewEmployee" method="POST">
					@csrf
					<div class="form-group">
						<label for="first-name-input">First name</label>
						<input type="text" class="form-control" id="first-name-input" name="first-name-input" placeholder="First Name">
					</div>
					<div class="form-group">
						<label for="last-name-input">Last name</label>
						<input type="text" class="form-control" id="last-name-input" name="last-name-input" placeholder="Last Name">
					</div>
                    <div class="form-group">
						<label for="phone-number-input">Phone number</label>
						<input type="text" class="form-control" id="phone-number-input" name="phone-number-input" placeholder="Phone number">
					</div>
                    <div class="form-group">
                        <select class="form-select form-select-sm" name="company-input" aria-label=".form-select-sm example">
                            <option selected>Open this select menu</option>
                            @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>
					<div class="form-group">
						<label for="email-input">Email Address</label>
						<input type="email" class="form-control" id="email-input" name="email-input" aria-describedby="emailHelp" placeholder="Enter email">
					</div>
                        
					<button type="submit" class="btn btn-blue" style="background-color:chocolate; border-radius: 4px; padding: 2px;">Submit</button>
				</form>
			</div>
    </x-slot>
</x-app-layout>
<div class="container">
    <div class="container-fluid p-0">
		<h1 class="h3 mb-3">New Employee</h1>
		<div class="row">
			<div class="col-xl-8">
				
			</div>
		<div>

	</div>
</div>