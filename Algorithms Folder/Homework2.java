// The Homework2 class that implements the quick sort algorithm for Card objects
// your name here

public class Homework2 
{
    // card comparison
    public int compares(Card c1, Card c2)
    {
       
       Card temp = c1;
       Card pivot = c2;
       int outcome=5;
      if (temp.getSuit() != pivot.getSuit()) 
       {//if test to see if the suits are different 
               if(temp.getSuit() < pivot.getSuit())
               {//if they are test to see if the suit we are looking is smaller than the pivot
                                   
               
                  outcome = -1;
               
               }//ends swap
               else if(temp.getSuit()>pivot.getSuit())
               {
                  outcome = 1;
               }
               else
               {
                  outcome = 0;
               }
        } //end of if that tests similarit in suit   
        else 
          {//if the suits are the same than the ranks have to be compared
               if(temp.getRank() < pivot.getRank())
               {//the actually comparison and swap
                  
                  outcome = -1;
               
               }//end the swap and comparison
               else if(temp.getRank() > pivot.getRank())
               {
                     outcome = 1;
               }
               else
               {
                  outcome =0;
               }
          } // compare the ranks ends 
       

        
        return outcome; // replace this statement with your own return
    }   
    
    // This method takes as parameters a card array, the start index, as well as
    // the end index, and returns the index of the pivot. The method partitions 
    // a subarray of cardArray indexed from startIndex to endIndex into two 
    // sections, with all the elements less than the pivot in the left section 
    // and all the elements greater than the pivot in the right section. You 
    // will have to use the compares method to make the comparisons.
    public int partition(Card[] cardArray, int startIndex, int endIndex)
    {//start of method
       int pivotPoint = startIndex;
       Card pivot = cardArray[pivotPoint];
       //getSuit()
       //getRank()
       int k = startIndex;
       int outcome;
       
       for(int i = startIndex +1; i<=endIndex; i++)
       {//start for loop
            Card temp = cardArray[i];
            outcome = compares(temp,pivot);
      
            if(outcome ==-1)
              {
                  k++;
                  cardArray[i] =cardArray[k];
                  cardArray[k]=temp;
              }
            /*
             else if(outcome ==1)
             {
                  
                  cardArray[i] =cardArray[k];
                 cardArray[k]=temp;
                 k++;
             }
             else
           {
                k++;
                 cardArray[i] =cardArray[k];
                cardArray[k]=temp;
              
           }
           */

       
       
                     
       }//end for loop
       
       
       pivotPoint =k;
       
       
       Card temp = cardArray[startIndex];
       cardArray[startIndex] =cardArray[pivotPoint];
       cardArray[pivotPoint] =temp;
       

       
       
       
       
       
        // TODO: implement this method
        
        return pivotPoint;
        
    }//end of method
    
    // recursive helper method for quickSort
    public void quickSortRec(Card[] cardArray, int startIndex, int endIndex)
    {
        if (endIndex > startIndex)
        {
            int pivotPoint;
            
            // partition the array
            pivotPoint = partition(cardArray, startIndex, endIndex);
            
            // sort the left subsection
            quickSortRec(cardArray, startIndex, pivotPoint - 1);
            
            // sort the right subsection
            quickSortRec(cardArray, pivotPoint + 1, endIndex);
        }
    }
    
    // quick sort
    public void quickSort(Card[] cardArray)
    {
        quickSortRec(cardArray, 0, cardArray.length - 1);
    } 
}
