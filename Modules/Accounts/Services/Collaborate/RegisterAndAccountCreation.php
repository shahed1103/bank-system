<?php

namespace Modules\Accounts\Services\Collaborate;
use Modules\Accounts\Services\Account\Factory\AccountFactory;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;


class RegisterAndAccountCreation {

    public function __construct(private UserService  $userService , private AccountFactory $accountFactory){
        $this->userService = $userService;
        $this->accountFactory = $accountFactory;
    }

    public function registerUserWithAccount($request): array{
        DB::beginTransaction();
        try{
        $data['user'] = $this->userService->register($request);
        $user = $data['user']['user'];

        $service = $this->accountFactory->make($request['account_type_id']);

        $data['account'] = $service->create($request , $user->id);

        DB::commit();

        $message = 'User and account created successfully';

        return ['userAccounut' => $data , 'message' => $message];

        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }



public function addDecorator(Request $request, $account_id): array
{

    $insurance_cost = 0;
    $premium_services_cost = 0;

    if ($request->boolean('insurance') && $request->filled('insurance_id')) {
        $insurance = Insurance::find($request->insurance_id);
        if ($insurance) {
            $insurance_cost = $insurance->cost;
        }
    }
    if ($request->boolean('premium_services') && $request->filled('premium_services_id')) {
        $premium_services = PremiumServices::find($request->premium_services_id);
        if ($premium_services) {
            $premium_services_cost = $premium_services->cost;
        }
    }
    $accountDecorate = Decorator::create([
        'account_id'          => $account_id,
        'insurance'           => $request->boolean('insurance'),
        'insurances_id'       => $request->insurance_id,
        'premium_services'    => $request->boolean('premium_services'),
        'premium_services_id' => $request->premium_services_id,
        'total_cost'          => $insurance_cost + $premium_services_cost
    ]);

    return [
        'decorator' => $accountDecorate,
        'message'   => 'Decorator added successfully'
    ];
}

}
