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
						<div class="card-header pb-0">
							<a href="{{ route('createNewEmployee') }}">
								<button class="btn btn-primary" style="background-color:chocolate; border-radius: 4px; padding: 2px;">Create new employee</button>
							</a>
						</div>
						<div class="card-body">
							<table class="table table-striped" style="width:100%">
								<thead>
									<tr>
										<th>First name</th>
										<th>Last name</th>
										<th>Company</th>
										<th>Phone number</th>
										<th>Email Address</th>
									</tr>
								</thead>
								<tbody>
									@foreach($employeesData as $index=> $key)
									<tr>
										<td style="text-align:center;">
											<a href="/viewEmployee/{{ $key->id }}">
												<?= $key->first_name ?>
											</a>
										</td>
										<td style="text-align:center;">
											<?= $key->last_name ?>
										</td>
										<td style="text-align:center;">
											<?= $key->company_name ?>
										</td>
										<td style="text-align:center;">
											<?= $key->phone_number ?>
										</td>
										<td style="text-align:center;">
											<?= $key->email ?>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							<div class="d-flex justify-content-center">
								{!! $employeesData->links() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>