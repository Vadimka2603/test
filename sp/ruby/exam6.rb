# Упражнение 6
# Разработать методы для программы Камень-Ножницы-Бумага.
# Метод rps_game_winner должен принимать на вход массив следующей структуры
# [ ["player1", "P"], ["player2", "S"] ], где P - бумага, S - ножницы, R - камень, и
# функционировать следующим образом:
# • если количество игроков больше 2 необходимо вызывать исключение
# WrongNumberOfPlayersError;
# • если ход игроков отличается от ‘R’, ‘P’ или ‘S’ необходимо вызывать
# исключение NoSuchStrategyError;
# • в иных случаях необходимо вернуть имя и ход победителя, если оба
# игрока походили одинаково - выигрывает первый игрок.
# Тесты для примеров и проверки:
# rps_game_winner([%w[player1 P], %w[player2 S], %w[player3 S]])) # =>
# WrongNumberOfPlayersError
# rps_game_winner([%w[player1 P], %w[player2 A]])) # => NoSuchStrategyError
# rps_game_winner([%w[player1 P], %w[player2 S]])) # => 'player2 S'
# rps_game_winner([%w[player1 P], %w[player2 P]])) # => 'player1 P' 

questarrays = [
	[%w[player1 P], %w[player2 S]],
	[%w[player1 P], %w[player2 P]],
	[%w[player1 P], %w[player2 A]],
	[%w[player1 P], %w[player2 S], %w[player3 S]]


]

b = [%w[player1 P], %w[player2 S]]

class WrongNumberOfPlayersError < Exception  
end

class NoSuchStrategyError < Exception  
end

def players(x)
  raise WrongNumberOfPlayersError, "WrongNumberOfPlayersError #{x}"
end

def strategy
	raise NoSuchStrategyError, "NoSuchStrategyError "
end

def go_win(array)
	move_p1 = array[0][1]
	move_p2 = array[1][1]
	p1 = array[0][0]
	p2 = array[1][0]
	if move_p1 == "R" or move_p1 == "P" or move_p1 == "S" or move_p2 == "R" or move_p2 == "P" or move_p2 == "S"
		if move_p1 == move_p2
			puts "Ничья! Но победил игрок: "+p1+" его ход: "+move_p1
		elsif move_p1 == "R" && move_p2 == "S" || #камень - ножницы
			  move_p1 == "P" && move_p2 == "R" || #бумага - камень
			  move_p1 == "S" && move_p2 == "P"	  #ножницы - бумага
			puts " Победил первый игрок: "+p1+" его ход: "+move_p1
		elsif move_p2 == "R" && move_p1 == "S" ||
			  move_p2 == "P" && move_p1 == "R" ||
			  move_p2 == "S" && move_p1 == "P" 
			  
			puts " Победил второй игрок: "+p2+" его ход: "+move_p2
		else 
			strategy()
		end
	else
		strategy()
	end
end


def go(array)
	i = 0
	array.each{|elem|
		if elem.length == 2
			puts "все корректно"
			i += 1
		elsif elem.length < 2
			puts "Нет игрока, либо нет варианта ответа"
			return false
		else
			puts "что то пошло не так, кто \
			 то из игроков использовал ещё одну руку?"
			 return false
		end 
		}

		if i == 2
			return true
		else
			return false
		end
end




def rps_game_winner(array)
	#проверим структуру массива, два массива по два члена в каждом
	if array.class == Array
		if array.empty?
			puts "Вы передали пустой массив"
		else
			if array.length == 2
				if go(array) == true
					puts "Начинаем игру"
					go_win(array)
				else

				end
			elsif array.length > 2
				players(array.length)
			else
				puts "Вы передали недостаточное количество игроков"
			end	
		end
	else
		puts "Вы передали не массив"
	end
end





begin
	questarrays.each{|elem| 
		if elem.empty?
			puts elem
			puts "----------------"
		else
			puts rps_game_winner(elem)
			puts "----------------"
		end
	}
rescue WrongNumberOfPlayersError => e
	puts e.backtrace
	puts e.message
rescue NoSuchStrategyError => e
	puts e.backtrace
	puts e.message

end