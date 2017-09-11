// Test driver for the Homework2 class
// Do not make any changes to this file!
// Xiwei Wang

import java.io.*;
import java.util.Arrays;

public class TestHomework2
{
    public static void main(String[] args)
    {        
        Homework2 myHW2 = new Homework2();
         
        try
        {
            // read the decks from file
            ObjectInputStream in = new ObjectInputStream(new FileInputStream("Decks.dat"));
            Deck[] myDeck = new Deck[5];
            myDeck = (Deck[])in.readObject();

            for (int i = 0; i < 5; i++)
            {
                Card[] myCards = myDeck[i].getPartialDeck(myDeck[i].getnumCards());
                String before = Arrays.toString(myCards);

                System.out.println("Test " + (i + 1) + ":");  
                System.out.println("The cards before sorting are\n" + before);
                System.out.println("------------------------------------");

                myHW2.quickSort(myCards);
                String after = Arrays.toString(myCards);

                System.out.println("The cards after Quick Sort are\n" + after); 
                if (after.equals(myDeck[i].getSortedDeck()))
                    System.out.println("Your Quick Sort works correctly.");
                else
                    System.out.println("Something is wrong with your Quick Sort.");  
                
                System.out.println("====================================\n");
            }
          
        }
        catch (Exception e)
        {
            System.out.println("Error occurred: " + e.getMessage());   
        }
        catch (StackOverflowError e)
        {
            System.out.println("Stack Overflow error occurred.");   
        }            
    }
}
