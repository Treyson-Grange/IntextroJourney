def is_prime(num):
    if num <= 1:
        return False
    if num <= 3:
        return True
    if num % 2 == 0 or num % 3 == 0:
        return False
    i = 5
    while i * i <= num:
        if num % i == 0 or num % (i + 2) == 0:
            return False
        i += 6
    return True
asdf = 0
for n in range(1, 1001):
    result = n**2 + n + 41
    if is_prime(result):
        asdf += 1
    else:
        print(f'n = {n}, n^2 + n + 41 = {result} is not prime')