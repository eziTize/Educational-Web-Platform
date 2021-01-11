<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payout Demo</title>
    <meta name="description" content="Meta Description">
    <meta name="keywords" content="Meta Keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSRF Token For Protection -->
    <script>window.Laravel = { csrfToken: '{{ csrf_token() }}'} 
    </script>
    <script src="https://kit.fontawesome.com/5810dc9d6a.js" crossorigin="anonymous"></script>

    <!------Style & Font------>
   
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700" rel="stylesheet" />

   <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css">

</head>
<body>

	<div class="leading-loose mt-10">
  <form method="POST" role="form" action="{{ route('payout.store') }}" class="container w-full md:w-1/2 mx-auto m-4 p-10 bg-white rounded shadow-xl">

  	@csrf

    <p class="text-gray-800 font-medium">Recepient Details</p>
    <div class="">
      <label class="block text-sm text-gray-00" for="name">Recepient Name</label>
      <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Enter Recepient Name" aria-label="name">
    </div>
    <div class="mt-5">
      <label class="block text-sm text-gray-00" for="ac_no">Account Number</label>
      <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="ac_no" name="ac_no" type="number" min="0" required="" placeholder="Enter A/C No." aria-label="ac_no">
    </div>

    <div class="mt-5">
      <label class="block text-sm text-gray-00" for="ac_type">Account Type</label>
      <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="ac_type" name="ac_type" type="text" required="" placeholder="Checking/Savings" aria-label="ac_type">
    </div>

    <div class="mt-5">
      <label class="block text-sm text-gray-00" for="amount">Payout Amount</label>
      <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="amount" name="amount" min="0" type="number" required="" placeholder="Enter Amount to be paid" aria-label="amount">
    </div>



    <div class="pt-8 mt-4">
      <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Submit</button>
    </div>


  </form>
</div>

</body>
</html>