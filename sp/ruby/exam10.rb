# Упражнение 10
# Разработайте функцию count_words(string), которая будет возвращать хэш со
# статистикой частоты употребления входящих в неё слов.
# Тесты для примеров и проверки:
# count_words("A man, a plan, a canal -- Panama")
#  # => {'a' => 3, 'man' => 1, 'canal' => 1, 'panama' => 1, 'plan' => 1}
# count_words "Doo bee doo bee doo"
#  # => {'doo' => 3, 'bee' => 2} 

def count_words(string)
	b = string.gsub(/[,-]/, "").downcase.split(' ')
	puts b.inject(Hash.new(0)){|hash, elem| 
	 	hash[elem] = hash[elem] + 1
	 	hash
	}
end

count_words("A man, a plan, a canal -- Panama")
count_words "Doo bee doo bee doo"