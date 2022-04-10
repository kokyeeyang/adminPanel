<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $company->name }}
        </h2>
    </x-slot>
    <div class="container">
    <div class="container-fluid p-0">
		<div class="row">
			<div class="col-xl-8">
				<div class="card">
				<form action="/viewCompany/update/{{ $company->id }}" method="POST" style="padding-bottom:10px;">
					<div class="form-group">
					@csrf
					@method('PUT')
						<label for="name-input">Name</label>
						<input type="text" class="form-control" id="name-input" name="name-input" placeholder="Name" value="<?= $company->name  ?>">
					</div>
					<div class="form-group">
						<label for="email-input">Email address</label>
						<input type="email" class="form-control" id="email-input" name="email-input" aria-describedby="emailHelp" placeholder="Enter email"  value="<?= $company->email  ?>">
					</div>
					<div class="form-group">
						<label for="website-input">Website</label>
						<input type="text" class="form-control" id="website-input" name="website-input" placeholder="Website"  value="<?= $company->website ?>">
					</div>
					<input name="company-id" type="hidden" value="<?= $company->id; ?>">
					<button type="submit" class="btn btn-primary" style="background-color:chocolate; border-radius: 4px; padding: 2px;">Submit</button>
				</form>
				<form action="{{ route('deleteCompany', $company->id) }}" method="POST">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-primary" style="background-color:chocolate; border-radius: 4px; padding: 2px;" onclick="deleteCompany()">Delete</button>
				</form>
			</div>
			</div>
		<div>
		<div class="row">
			<div class="col-xl-8">
				<div class="card">
					<div class="card-header pb-0">
						<h5 class="card-title mb-0">Employees</h5>
					</div>
					<div class="card-body">
						<table class="table table-striped" style="width:100%">
							<thead>
								<tr>
									<th>First name</th>
									<th>Last name</th>
									<th>Email</th>
									<th>Phone number</th>
								</tr>
							</thead>
							<tbody>
                                @foreach($companyEmployees as $companyEmployee)
                                    <tr>
										<td style="text-align:center;">
											<a href="/viewEmployee/{{ $companyEmployee->id }}">
                                                <?= $companyEmployee->first_name ?>
											</a>
										</td>
                                        <td style="text-align:center;">
                                            <?= $companyEmployee->last_name ?>
                                        </td>
                                        <td style="text-align:center;">
                                            <?= $companyEmployee->email ?>
                                        </td>
                                        <td style="text-align:center;">
                                            <?= $companyEmployee->phone_number ?>
                                        </td>
                                    </tr>
                                @endforeach
							</tbody>
						</table>
						<div class="d-flex justify-content-center">
							{!! $companyEmployees->links() !!}
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>
</div>
<script>
	function deleteCompany(){
		confirmationMessage = 'Are you sure you want to delete this company?';
		if (confirm(confirmationMessage) != true){
			event.preventDefault();
		}
	}
</script> 
</x-app-layout>
