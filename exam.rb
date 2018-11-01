begin
    require 'twitter_cldr'
    puts "gem = ActiveSuport успешно подключен"
rescue
    puts "Не установлен Gem = activesupport"
    puts "Доступно сравнение только на латинице"
    inter = gets.chomp
end
 
questions = 
[
    "A man, a plan, a canal -- Panama",
    "Madam, I'm Adam!",
    "Abracadabra"
]
 
def palindrome?(str)
    str = str.force_encoding('iso-8859-1').encode('utf-8')
    ignore_str = str.gsub(/([ ,!'-])/, '').downcase
    if ignore_str.reverse == ignore_str
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
 
puts "Please check palindrome press input"
a = gets.chomp
puts palindrome?(a)
puts "please enter any key..."
b = gets.chomp
