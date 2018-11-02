# Разработайте метод palindrome?(string), который будет определять, является ли
# строка string палиндром (строкой, которая читается одинаково как с начала так и с
# конца), при условии игнорирования пробелов, знаков препинания и регистра.
# Тесты для примеров и проверки:
# palindrome?("A man, a plan, a canal -- Panama") # => true
# palindrome?("Madam, I'm Adam!") # => true
# palindrome?(333) # => true
# palindrome?(nil) # => false
# palindrome?("Abracadabra") # => false 


begin
    require 'unicode'
    puts "gem: unicode успешно подключен"
rescue LoadError
    puts "!!!Не установлен gem: unicode!!!"
    puts "---Кирилица возможно обрабатывается неверно---"
end
 
questions = 
[
    "A man, a plan, a canal -- Panama",
    "Madam, I'm Adam!",
    "333",
    "",
    "Abracadabra",
    "Шалаш"
]
 
def palindrome?(str)
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
 
puts "Вывод тестовых заданий:"
questions.each { |question|
    puts question+" --- "+
    palindrome?(question).to_s
}
 

