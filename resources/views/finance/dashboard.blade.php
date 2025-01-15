<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <div class="flex justify-around space-x-4">
            <div class="bg-blue-500 text-white p-6 rounded-lg shadow-md w-1/3">
                <div class="text-3xl font-bold mb-2">{{ $financeData->total_students }}</div>
                <div class="text-sm">Total Students</div>
                 <div class="mt-2"><a href="#" class="text-white hover:underline">View all students</a></div>
            </div>
          <div class="bg-green-500 text-white p-6 rounded-lg shadow-md w-1/3">
                <div class="text-3xl font-bold mb-2">{{ $financeData->getRemainingSum() }}</div>
                <div class="text-sm">Remaining Balance</div>
              <div class="mt-2"><a href="#" class="text-white hover:underline">View Details</a></div>
            </div>
          <div class="bg-gray-800 text-white p-6 rounded-lg shadow-md w-1/3">
               <div class="text-3xl font-bold mb-2">{{ $financeData->total_sum }}</div>
                <div class="text-sm">Total Sum</div>
              <div class="mt-2"></div>
          </div>
        </div>


      <div class="mt-8">
          <h2 class="text-2xl font-semibold mb-4">Manage Finance Data</h2>
        <div class="bg-white p-4 rounded shadow">
         <!-- Add Outgoing -->
         <h3 class="text-lg font-semibold mb-2">Add Outgoing</h3>
            <form method="post" action="{{ route('finance.add-outgoing') }}" class="mb-4">
                @csrf
                <div class="mb-2">
                    <label for="student_id" class="block text-gray-700 text-sm font-bold mb-2">Student ID</label>
                    <input type="text" name="student_id" id="student_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-2">
                    <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Amount</label>
                    <input type="number" name="amount" id="amount"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add Outgoing</button>
            </form>


            <!-- Remove Outgoing -->
               <h3 class="text-lg font-semibold mb-2">Remove Outgoing</h3>
            <form method="post" action="{{ route('finance.remove-outgoing') }}" class="mb-4">
                @csrf
              <div class="mb-2">
                  <label for="student_id" class="block text-gray-700 text-sm font-bold mb-2">Student ID</label>
                  <input type="text" name="student_id" id="student_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-2">
                  <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Amount</label>
                  <input type="number" name="amount" id="amount" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Remove Outgoing</button>
            </form>
            
            <!-- Set Total Sum -->
            <h3 class="text-lg font-semibold mb-2">Set Total Sum</h3>
             <form method="post" action="{{ route('finance.set-total-sum') }}" class="mb-4">
                @csrf
                 <div class="mb-2">
                    <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Total Sum</label>
                    <input type="number" name="amount" id="amount" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Set Total Sum</button>
            </form>


            <!-- Set Student Count -->
             <h3 class="text-lg font-semibold mb-2">Set Student Count</h3>
              <form method="post" action="{{ route('finance.set-student-count') }}">
                 @csrf
                  <div class="mb-2">
                    <label for="count" class="block text-gray-700 text-sm font-bold mb-2">Total Students</label>
                    <input type="number" name="count" id="count"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                   <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Set Total Students</button>
              </form>
        </div>
    </div>
        
    @if(session('success'))
         <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            <p>{{ session('success') }}</p>
        </div>
     @endif
  
     @if($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
           <ul>
             @foreach($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
           </ul>
        </div>
       @endif
</div>

</body>
</html>