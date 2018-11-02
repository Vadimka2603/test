# Дан массив array и числовой диапазон range. Разработайте метод coincidence(array,
# range) для определения элементов из массива array, значения которых входят в
# указанный диапазон. Если не передан хотя бы один из параметров, то должен
# вернуться пустой массив.
# Тесты для примеров и проверки:
# coincidence([1, 2, 3, 4, 5], (3..5)) # => [3, 4, 5]
# coincidence() # => []
# coincidence([nil, 1, 'foo', 4, 2, 2.5], (1..3)) # => [1, 2, 2.5] 
questarrays = [
	[1,2.5,3,4,5,3..5],
	[],
	[nil, 1, 'foo', 4, 2, 2.5, (1..3)]
]
preic = (2..5)



def is_truequest?(num)
	if num.class == Integer or num.class == Float
		return true
	else
		return false
	end
end

def coincedence(array, lots)

	a = []
	if array.to_a.empty?
		return a
	else
		array.each {|elem|
			if is_truequest?(elem) == true 
				if elem >= lots.to_a.first && elem <= lots.to_a.last
					a << elem
				else
					#-----------------
				end
			else

			end 
		}
		return a
	end
end

begin
	puts "Вывод тестового задания:"
	questarrays.each{|elem| 
		puts coincedence(elem[0, elem.size-1], elem.pop)
		puts "_________________"
	}
	
rescue ArgumentError
	puts []
end
