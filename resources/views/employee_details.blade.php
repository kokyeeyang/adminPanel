<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
					<div class="card">
						<form action="/viewEmployee/update/{{ $employeesData->id }}" method="POST" style="padding-bottom:10px">
							@csrf
							@method('PUT')
							<div class="flex flex-col mb-3">
								<label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="first-name-input">{{ __('First name:') }}</label>
								<input type="text" class="border py-2 px-3 text-grey-darkest" id="first-name-input" name="first-name-input" placeholder="First Name" value="{{ $employeesData->first_name  }}" required>
							</div>
							<div class="form-group">
								<label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="last-name-input">{{ __('Last name:') }}</label>
								<input type="text" class="form-control" id="last-name-input" name="last-name-input" placeholder="Last Name" value="{{ $employeesData->last_name  }}" required>
							</div>
							<div class="form-group">
								<label  class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="phone-number-input">{{ __('Phone number:') }}</label>
								<input type="text" class="form-control" id="phone-number-input" name="phone-number-input" placeholder="Phone number" value="{{ $employeesData->phone_number }}">
							</div>
							<div class="form-group" id="company-dropdown" style="margin-top:10px;">
								<label class="mb-2 uppercase font-bold text-lg text-grey-darkest" for="company-input">{{ __('Company:') }}</label>
								<select class="form-select form-select-sm" name="company-input" aria-label=".form-select-sm example" required>
									@foreach($companies as $company)
										<?= $employeesData->company == $company->id ? $selected = 'selected = "selected"': $selected = '' ?>
										<option value="{{ $company->id }}" {{ $selected }}>{{ $company->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label for="email-input">Email Address</label>
								<input type="email" class="form-control" id="email-input" name="email-input" aria-describedby="emailHelp" placeholder="Enter email"  value="{{ $employeesData->email  }}">
							</div>
							<button type="submit" class="btn btn-primary" style="background-color:chocolate; border-radius: 4px; padding: 2px;">Submit</button>
						</form>
						<form action="{{ route('deleteEmployee', $employeesData->id) }}" method="POST">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-primary" style="background-color:chocolate; border-radius: 4px; padding: 2px;" onclick="deleteEmployee()">Delete</button>
						</form>
					</div>
                </div>
            </div>
        </div>
    </div>
	<script>
		function deleteEmployee(){
			confirmationMessage = 'Are you sure you want to delete this employee?';
			if (confirm(confirmationMessage) != true){
				event.preventDefault();
			}
		}
	</script>
</x-app-layout>
