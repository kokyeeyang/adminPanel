<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
					<div class="card">
						<form action="saveNewCompany" method="POST">
							<div class="form-group">
							@csrf
								<label for="name-input">Name</label>
								<input type="text" class="form-control" id="name-input" name="name-input" placeholder="Name">
							</div>
							<div class="form-group">
								<label for="email-input">Email address</label>
								<input type="email" class="form-control" id="email-input" name="email-input" aria-describedby="emailHelp" placeholder="Enter email">
							</div>
							<div class="form-group">
								<label for="website-input">Website</label>
								<input type="text" class="form-control" id="website-input" name="website-input" placeholder="Website">
							</div>
							<input name="company-id" type="hidden">
							<button type="submit" class="btn btn-primary" style="background-color:chocolate; border-radius: 4px; padding: 2px;">Submit</button>
							<input name="company-id" type="hidden">
						</form>
					</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>