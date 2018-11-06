# Упражнение 13
# Адаптируйте ваше решение из Упражнения 1 так, чтобы вместо palindrome?("foo")
# вы могли его использовать как "foo".palindrome? # => false.
begin
    require 'unicode'
    puts "gem: unicode успешно подключен"
rescue LoadError
    puts "!!!Не установлен gem: unicode!!!"
    puts "---Кирилица возможно обрабатывается неверно---"
end


class String

	def palindrome?
		str = self.to_s
		str = Unicode::downcase(str)
	    ignore_str = str.gsub(/([ ,!'-])/, '').downcase
	    if str.length == 0
	        return false
	    elsif ignore_str.reverse == ignore_str
	        return true
	    else
	        return false
	    end
	end
end

puts "foo".palindrome?


