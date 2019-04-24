# # Assignment:
# number   = 42
# opposite = true



# # Conditions:
# number = -42 if opposite

# # Functions:
# square = (x) -> x * x

# # Arrays:
# list = [1, 2, 3, 4, 5]

# # Objects:
# math =
#   root:   Math.sqrt
#   square: square
#   cube:   (x) -> x * square x

# # Splats:
# race = (winner, runners...) ->
#   print winner, runners 

# # Existence: 
# alert "I knew it!" if elvis?

# # Array comprehensions:
# cubes = (math.cube num for num in list)

$(document).ready -> 
  html = document.getElementById('coffee')
  number1 = prompt("Введите первое число")
  get_char = prompt("Введите действие")
  number2 = prompt("Введите второе число")
  html.innerHTML = calc(Number(number1), Number(number2), get_char)
  

calc = (number1, number2, get_char) -> 
  switch get_char 
    when '+' then number1 + number2 
    when '-' then number1 - number2
    when '/' then number1 / number2 
    when '*' then number1 * number2



