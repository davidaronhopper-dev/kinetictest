for x in range(100):
	x = x+1
	y = x / 3
	z = x / 5
	if y-int(y) == 0 and z-int(z) == 0:
		print("FizzBuzz")
	elif y-int(y) == 0:
		print("Fizz")
	elif z-int(z) == 0:
		print("Buzz")
	else:
		print(x)