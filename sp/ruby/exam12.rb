# Упражнение 12
# Создайте класс JellyBean, расширяющий класс Dessert (из Упражнения 11) новыми
# геттерами и сеттерами для атрибута flavor. Измените метод delicious? таким
# образом, чтобы он возвращал false только в тех случаях, когда flavor равняется
# «black licorice».
class Desert

	attr_accessor :calories, :names

	def initialize(calories, names)
		@calories = calories
		@names = names

		healthy?
	end

	def healthy?
		if calories < 200
			puts "можно"
			return true
		else
			puts "Хорошо подумай"
			return false
		end
	end

	def delicious?
		return true
	end


end


class JellyBean < Desert
	attr_accessor :flavor

	def initialize(calories, names, flavor)
		@flavor = flavor
		@calories = calories
		@names = names
	end

	def delicious?
		if flavor == "black licorice"
			return true
		else
			return false
		end
	end

end

b = JellyBean.new(199, "Вкусняшка", "black licorice")

puts b.calories
puts b.names
puts b.flavor
puts b.delicious?