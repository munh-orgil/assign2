@props(['disabled' => false])

<input type="file" name="picture" $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'p-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>