# Упражнение 9
# Необходимо разработать метод connect_hashes(hash1, hash2), который соединит
# два переданных хеша, значениями ключей в которых являются числа, и вернет
# новый хэш, полученный по следующим правилам:
# • приоритетными являются ключи того хэша, сумма значений ключей
# которого больше (если суммы значений ключей будут равны, то второй
# хэш считается более приоритетнее)
# • ключи со значениями меньше 10 не должны попасть в финальный хэш
# • получившийся хэш должен вернуться упорядоченным по значениям
# ключей в порядке возрастания.
# Тесты для примеров и проверки:
# connect_hashes({ a: 2, b: 12 }, { c: 11, e: 5 }) # => { c: 11, b: 12 }
# connect_hashes({ a: 13, b: 9, d: 11 }, { c: 12, a: 15 }) # => { d: 11, c:
# 12, a: 13 }
# connect_hashes({ a: 14, b: 12 }, { c: 11, a: 15 }) # => { c: 11, b: 12, a:
# 15 } 
hash1 = { a: 13, b: 9, d: 11 }
hash2 = { c: 12, a: 15 }


def connect_hashes(hash1, hash2)

	summh1 = hash1.inject(0){|result, (key, value)| result + value.to_i}
	summh2 = hash2.inject(0){|result, (key, value)| result + value.to_i}

	if summh2 > summh1
		mergearray = hash2.merge(hash1){|key, v1, v2| v1} # если встречается одинаковый ключ берем значение
	elsif summh1 > summh2
		mergearray = hash1.merge(hash2){|key, v1, v2| v1} # если встречается одинаковый ключ берем значение
	elsif summh2 == summh1
		mergearray = hash2.merge(hash1){|key, v1, v2| v1} # если встречается одинаковый ключ берем значение
	else
		puts "Что то пошло не так"
	end
	mergearray.map{|key, value|
		if value < 10
			mergearray.delete(key)
		else
		end
	}

	puts Hash[*mergearray.sort_by{|key, value| value}.flatten]
end

connect_hashes({ a: 2, b: 12 }, { c: 11, e: 5 }) # => { c: 11, b: 12 }
connect_hashes({ a: 13, b: 9, d: 11 }, { c: 12, a: 15 }) # => { d: 11, c:
# 12, a: 13 }
connect_hashes({ a: 14, b: 12 }, { c: 11, a: 15 }) # => { c: 11, b: 12, a:
# 15 } 
