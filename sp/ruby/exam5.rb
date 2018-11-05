def date_in_future(int)
	if int.class == Integer
		b = (Time.now + int.to_i.days)\
			.strftime("%d-%m-%Y %H:%M:%S")
		return b
	else
		b = Time.now.strftime("%d-%m-%Y %H:%M:%S")
		return b
	end
	
end


begin
	require "active_support/time"
	require 'date'
	puts "библиотека ActiveSupports подключена"
	puts "Выполнение тестовых заданий:"
	puts "Вывод +2 дня:"
	puts date_in_future(2)
	puts "Вывод не целого:"
	puts date_in_future([])
rescue LoadError
	puts "active_support не подключенна"
end