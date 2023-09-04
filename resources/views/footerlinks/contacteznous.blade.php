<x-app-layout>

    <div class="max-w-md mx-auto bg-white p-8 mt-10 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold mb-6">Contactez-nous</h2>
        <form action="#" method="POST">
            @csrf
    
            <div class="mb-4">
                <label for="name" class="block text-gray-600 font-medium mb-2">Nom</label>
                <input type="text" id="name" name="name" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring focus:border-blue-300">
            </div>
    
            <div class="mb-4">
                <label for="email" class="block text-gray-600 font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring focus:border-blue-300">
            </div>
    
            <div class="mb-4">
                <label for="reason" class="block text-gray-600 font-medium mb-2">Raison du contact</label>
                <select id="reason" name="reason" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring focus:border-blue-300">
                    <option value="simple_question">Simple question</option>
                    <option value="erreur_technique">Erreur technique</option>
                    <option value="suppression_donnees">Suppression de mes données</option>
                </select>
            </div>
    
            <div class="mb-4">
                <label for="message" class="block text-gray-600 font-medium mb-2">Message</label>
                <textarea id="message" name="message" rows="4" class="border rounded-lg py-2 px-3 w-full focus:outline-none focus:ring focus:border-blue-300"></textarea>
            </div>
    
            <div class="text-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring focus:border-blue-300">Envoyer</button>
            </div>
        </form>
    </div>
</x-app-layout>