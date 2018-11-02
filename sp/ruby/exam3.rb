# Дан массив элементов произвольной природы. Необходимо разработать метод
# max_odd(array), который определит максимальный нечетный элемент. Вернуть nil,
# если таких элементов нет в переданном массиве.
# Тесты для примеров и проверки:
# max_odd([1, 2, 3, 4, 4]) # => 3
# max_odd([21.0, 2, 3, 4, 4]) # => 21
# max_odd(['ololo', 2, 3, 4, [1, 2], nil]) # => 3
# max_odd(%w[ololo fufufu]) # => nil
# max_odd([2, 2, 4]) # => nil 

questarrays = [
	[1, 2, 3, 4, 4],
	[21.0, 2, 3, 4, 4],
	['ololo', 2, 3, 4, [1, 2], nil],
	%w[ololo fufufu],
	[2, 2, 4]

]
def max_odd(array)
	a = array.find_all{|key| key.class == Integer || key.class == Float}.\
			find_all{|i| i.round % 2 == 1}.max.to_i
	if a == 0 

		return nil
	else
		return a
	end

end

puts "Вывод тестовых заданий: "
questarrays.each{|elem| puts max_odd(elem)}
