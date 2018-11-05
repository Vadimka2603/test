# Упражнение 8
# Написать метод multiply_numbers(inputs), который вернет произведение цифр,
# входящих в inputs.
# Тест для примеров и проверки:
# multiply_numbers() # => nil
# multiply_numbers('ss') # => nil
# multiply_numbers('1234') # => 24
# multiply_numbers('sssdd34') # => 12
# multiply_numbers(2.3) # => 6
# multiply_numbers([5, 6, 4]) # => 120 


questarrays = [
	"ss",
	"1234",
	"sssdd34",
	2.3,
	[5,6,4]

]

def multiply_numbers(inputs)
	i = 0
	i.to_i
	inputs.to_s.gsub(/[^0-9]/, "").split('').each{|elem|
		i = i + elem.to_i
	}
	puts i
end

puts "Вывод тестовых заданий: "
questarrays.each{|elem|
	multiply_numbers(elem)

}


