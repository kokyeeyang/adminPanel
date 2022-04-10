<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Companies') }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 bg-white border-b border-gray-200">
					<div class="card">
						<div class="card-header pb-0">
							<a href="{{ route('createNewCompany') }}">
								<button class="btn btn-primary" style="background-color:chocolate; border-radius: 4px; padding: 2px;">Create new company</button>
							</a>
						</div>
						<div class="card-body">
							<table class="table table-striped" style="width:100%">
								<thead>
									<tr>
										<th>Name</th>
										<th>Email</th>
										<th>Website</th>
									</tr>
								</thead>
								<tbody>
									@foreach($companiesData as $index=> $key)
									<tr>
										<td style="text-align:center;">
											<a href="/viewCompany/{{ $key->id }}">
												{{ $key->name }}
											</a>
										</td>
										<td style="text-align:center;">
											{{ $key->email }}
										</td>
										<td style="text-align:center;">
											{{ $key->website }}
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							<div class="d-flex justify-content-center">
								{!! $companiesData->links() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>